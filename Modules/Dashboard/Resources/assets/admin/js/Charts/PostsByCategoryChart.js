import Chart from 'chart.js';
import ChartColors from './Helpers/ChartColors';
import Reducers from "./Helpers/Reducers";

export default class PostsByCategoryChart
{
    constructor(element) {
        this.element = element;
        this.fetch();
    }

    fetch() {
        axios.post('/api/query', {
            entity: 'Modules\\News\\Entities\\PostCategory',
            cache: {
                duration: null,
                tags: [
                    'Modules\\News\\Entities\\Post',
                    'Modules\\News\\Entities\\PostCategory'
                ]
            },
            mutations: [
                {
                    key: 'with-count',
                    args: {
                        relations: ['posts']
                    }
                }
            ]
        })
        .then(({data}) => this.handleFetch(data));
    }

    handleFetch(data) {
        if (data.success) {
            let results = Reducers.reduceCount(data.results, 'name', 'posts_count');
            this.mount(results.labels, results.values);
        } else {
            console.error(data.errorMessage);
        }
    }

    mount(labels, values) {
        this.element.closest('.dashboard-chart').addClass('show');

        this.chart = new Chart(this.element, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: ChartColors.allColors(0.5)
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
