import Chart from 'chart.js';
import ChartColors from './Helpers/ChartColors';

export default class UsersByActivityChart
{
    constructor(element) {
        this.element = element;
        this.fetch();
    }

    fetch() {
        axios.post('/api/query', {
            entity: 'Modules\\Auth\\Entities\\User',
            cache: {
                duration: null,
                tags: [
                    'Modules\\Auth\\Entities\\User'
                ]
            }
        })
        .then(({data}) => this.handleFetch(data));
    }

    handleFetch(data) {
        if (data.success) {
            let results = this.reduceResults(data.results);
            this.mount(results.labels, results.values);
        } else {
            console.error(data.errorMessage);
        }
    }

    reduceResults(results) {
        let labels = ['Active', 'Inactive'], values = [0, 0];

        results.forEach(user => {
            if (user.is_active) {
                values[0]++;
            } else {
                values[1]++;
            }
        });

        return {labels, values};
    }

    mount(labels, values) {
        this.element.closest('.dashboard-chart').addClass('show');

        this.chart = new Chart(this.element, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: ChartColors.getColors(['green', 'red'], 0.5)
                }]
            },
            options: {
                legend: {
                    position: 'bottom'
                }
            }
        });
    }
}
