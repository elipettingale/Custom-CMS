class ActiveTimer
{
    constructor(element) {
        this.element = $(element);
        this.time = {
            day: 0,
            hour: 0,
            minute: 0,
            second: 0
        };

        this.initialize();
        this.start();
    }

    initialize() {
        let data = this.element.html().split(' ');

        for (let i = 0; i < data.length; i = i + 2) {
            let key = data[i + 1];
            let value = parseInt(data[i]);

            if (key === 'days' || key === 'day') {
                this.time.day = value;
            }

            if (key === 'hours' || key === 'hour') {
                this.time.hour = value;
            }

            if (key === 'minutes' || key === 'minute') {
                this.time.minute = value;
            }

            if (key === 'seconds' || key === 'second') {
                this.time.second = value;
            }
        }
    }

    start() {
        window.setInterval(() => {
            this.tick();
            this.render();
        }, 1000);
    }

    tick() {
        if (this.time.second !== 0) {
            this.time.second = this.time.second - 1;
            return;
        }

        if (this.time.minute !== 0) {
            this.time.minute = this.time.minute - 1;
            this.time.second = 59;
            return;
        }

        if (this.time.hour !== 0) {
            this.time.hour = this.time.hour - 1;
            this.time.minute = 59;
            this.time.second = 59;
            return;
        }

        if (this.time.day !== 0) {
            this.time.day = this.time.day - 1;
            this.time.hour = 23;
            this.time.minute = 59;
            this.time.second = 59;
        }
    }

    render() {
        let output = [];

        for (let key in this.time) {
            let value = this.time[key];

            if (value === 1) {
                output.push(`${value} ${key}`);
            }

            if (value > 1) {
                output.push(`${value} ${key}s`);
            }
        }

        this.element.html(output.join(' '));
    }
}

$('.active-timer').each(function() {
    new ActiveTimer(this);
});
