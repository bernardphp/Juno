var JunoPoller = function (elm, url, timeout) {
    this.isRunning = false;
    this.timer     = false;
    this.elm       = elm;
    this.timeout   = timeout * 1000;
    this.url       = url;
};

JunoPoller.prototype = {
    start : function () {
        if (this.timer) {
            return;
        }

        if (this.isRunning) {
            return;
        }

        this.timer = setInterval($.proxy(this.interval, this), this.timeout);
    },
    stop: function () {
        if (this.timer) {
            clearInterval(this.timer);
        }

        this.isRunning = false;
    },
    isStarted : function () {
        return this.timer ? true : false;
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
    var content = $('#content'),
        poller  = new JunoPoller(content, window.location, 5);

    if (!content.data('poll')) {
        return;
    }

    poller.start();
});
