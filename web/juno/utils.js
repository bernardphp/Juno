Juno.filter('timeAgo', function () {
    'use strict';

    return function (time_ago, accuracy, time_now) {
        var timeAgo = {
            execute: function (time_ago, accuracy, time_now) {
                var difference, grouped_difference;

                // Validation
                if (time_ago === undefined || time_ago === null) {
                    return null;
                }

                if (accuracy < 1) {
                    return null;
                }

                // Default values
                time_ago = new Date(time_ago);

                if (accuracy === undefined || accuracy === null) {
                    accuracy = 1;
                }

                if (time_now === undefined || time_now === null) {
                    time_now = new Date();
                } else {
                    time_now = new Date(time_now);
                }

                // Calculation
                difference = this.calculateDifference(time_now, time_ago);

                if (difference === 0) {
                    return 'just now';
                }

                grouped_difference = this.groupDifference(difference);
                grouped_difference = this.applyAccuracy(grouped_difference, accuracy);

                return this.toString(grouped_difference, (time_ago > time_now));
            },
            calculateDifference: function (now, ago) {
                return Math.abs(Math.round((now - ago) / 1000));
            },
            groupDifference: function (difference) {
                var grouped_difference = [],
                    second_groups = {
                        year: 365 * 24 * 60 * 60,
                        month: 31 * 24 * 60 * 60,
                        week: 7 * 24 * 60 * 60,
                        day: 24 * 60 * 60,
                        hour: 60 * 60,
                        minute: 60,
                        second: 1
                    },
                    group,
                    group_seconds,
                    group_count,
                    group_string;

                // Iterate through and build an array of preformatted strings
                for (group in second_groups) {
                    group_seconds = second_groups[group];
                    group_count = Math.floor(difference / group_seconds);
                    group_string = this.formatGroup(group_count, group);

                    // Add the null values after the first group
                    // so that the accuracy is for all groups, and not only the
                    // groups with a value
                    if (group_string !== null || grouped_difference.length > 0) {
                        grouped_difference.push(group_string);
                    }

                    difference -= group_count * group_seconds;
                }

                return grouped_difference;

            },
            formatGroup: function (quantity, group_name) {
                if (quantity < 1) {
                    return null;
                }

                var plural = (quantity > 1) ? 's' : '';

                return quantity + ' ' + group_name + plural;
            },
            applyAccuracy: function (grouped_difference, accuracy) {
                grouped_difference.length = Math.min(grouped_difference.length, accuracy);

                return grouped_difference;
            },
            toString: function (grouped_difference, in_future) {
                var string;

                grouped_difference = this.removeNullValues(grouped_difference);
                string = this.joinArray(grouped_difference);

                return (in_future) ? 'in ' + string : string + ' ago';
            },
            removeNullValues: function (array) {
                var i, clean_array = [];

                for (i = 0; i !== array.length; i++) {
                    if (array[i] !== null) {
                        clean_array.push(array[i]);
                    }
                }
                return clean_array;
            },
            joinArray: function (array) {

                if (array.length === 1) {
                    return array[0];
                }

                return array.slice(0, -1).join(' ') + ' and ' + array[array.length - 1];
            }
        };

        return timeAgo.execute(time_ago, accuracy, time_now);
    };
});

Juno.filter('split', function() {
    return function(input, delimiter) {
        var delimiter = delimiter || ',';
        var pieces = input.split(delimiter);

        return pieces[pieces.length -1];
    };
});

Juno.filter('empty', function () {
    return function (input) {
        return angular.equals({}, input);
    };
});

Juno.filter('range', function () {
    return function (input, range) {
        return Array.apply(null, Array(range)).map(function (_, i) {return i;});
    }
});
