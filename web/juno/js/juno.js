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
        this.elm.dispatchEvent(new CustomEvent('JunoPollerStart'));
    },
    stop: function () {
        if (this.timer) {
            clearInterval(this.timer);
        }

        this.isRunning = false;
        this.elm.dispatchEvent(new CustomEvent('JunoPollerStop'));
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
        this.elm.innerHTML = data;
    }
};

var Juno = function (content, button, poller) {
    this.content = content;
    this.button = button;
    this.poller = poller;
};

Juno.prototype = {
    initialize : function () {
        if (!this.content || !this.button) {
            return;
        }

        this.content.addEventListener('JunoPollerStart', $.proxy(this.onJunoPollerStart, this));
        this.content.addEventListener('JunoPollerStop', $.proxy(this.onJunoPollerStop, this));
        this.button.addEventListener('click', $.proxy(this.onButtonClick, this));
    },
    onJunoPollerStart : function (e) {
        this.button.innerHTML = 'Polling....';
        this.button.classList.toggle('active');

        window.location.hash = '#poll';
    },
    onJunoPollerStop : function (e) {
        this.button.innerHTML = 'Start polling';
        this.button.classList.toggle('active');

        window.location.hash = '';
    },
    onButtonClick : function (e) {
        if (this.poller.isStarted()) {
            this.poller.stop();
        } else {
            this.poller.start();
        }

        e.preventDefault();
    }
};

$(document).ready(function(){
    var content = document.getElementById('content'),
        button  = document.getElementById('poller'),
        poller  = new JunoPoller(content, window.location, 5),
        juno    = new Juno(content, button, poller);

    if (!button) {
        return;
    }

    juno.initialize();

    if (window.location.hash == '#poll') {
        poller.start();
    }
});
