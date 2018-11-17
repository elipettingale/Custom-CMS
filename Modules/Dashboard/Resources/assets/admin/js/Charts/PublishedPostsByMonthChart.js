import Chart from 'chart.js';
import ChartColors from './Helpers/ChartColors';
import Reducers from "./Helpers/Reducers";

export default class PublishedPostsByMonthChart
{
    constructor(element) {
        this.element = element;
        this.currentMonth = moment().format('MM');
        this.numberOfMonths = 6;

        this.fetch();
    }

    fetch() {
        axios.post('/api/query', {
            entity: 'Modules\\News\\Entities\\Post',
            cache: {
                duration: null,
                tags: [
                    'Modules\\News\\Entities\\Post'
                ]
            },
            mutations: [
                {
                    key: 'where',
                    args: {
                        attribute: 'status',
                        value: 'live'
                    }
                },
                {
                    key: 'where',
                    args: {
                        attribute: 'published_at',
                        comparison: '>=',
                        value: moment(this.currentMonth, 'MM').subtract(this.numberOfMonths, 'month').format('YYYY-MM-DD HH:mm:ss')
                    }
                }
            ]
        })
        .then(({data}) => this.handleFetch(data));
    }

    handleFetch(data) {
        if (data.success) {
            let results = Reducers.reduceCountByMonth(data.results, 'published_at', this.numberOfMonths);
            this.mount(results.labels, results.values);
        } else {
            console.error(data.errorMessage);
        }
    }

    mount(labels, values) {
        this.element.closest('.dashboard-chart').addClass('show');

        this.chart = new Chart(this.element, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Posts',
                    data: values,
                    backgroundColor: ChartColors.getColor('cyan', 0.2),
                    borderColor: ChartColors.getColor('cyan', 1),
                    borderWidth: 1
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
