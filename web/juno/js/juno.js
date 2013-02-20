var Juno = function (elm, url, timeout) {
    this.isRunning = false;
    this.elm       = elm;
    this.timeout  = timeout * 1000;
    this.url       = url;
};

Juno.prototype = {
    poll : function () {
        setInterval($.proxy(this.interval, this), this.timeout);
    },
    get : function () {
        $.get(this.url, $.proxy(this.callback, this));
    },
    interval : function () {
        if (this.isRunning) {
            return;
        }

        this.isRunning = true;
        this.get();
    },
    callback : function (data) {
        this.isRunning = false;
        this.elm.html(data);
    }
};

$(document).ready(function(){
    var elm = $('#content');

    if (elm.data('poll')) {
        var juno = new Juno(elm, window.location, 5);
        juno.poll();
    }
});
