export default class Reducers
{
    static reduceCount(results, labelColumn, valueColumn)
    {
        let labels = [], values = [];

        results.forEach(function(item) {
            labels.push(item[labelColumn]);
            values.push(item[valueColumn])
        });

        return {labels, values};
    }

    static reduceCountByWeek(results, column, numberOfWeeks)
    {
        let labels = [], values = [];
        let currentWeek = moment().format('W');

        for (let i = (currentWeek - numberOfWeeks); i <= currentWeek; i++) {
            labels.push(i);
            values.push(0);
        }

        results.forEach(function(item) {
            let week = moment(item[column]).format('W');
            let index = labels.indexOf(parseInt(week));
            values[index]++;
        });

        labels.forEach(function(label, index) {
            labels[index] = moment(label, 'W').format('DD/MM');
        });

        return {labels, values}
    }

    static reduceCountByMonth(results, column, numberOfMonths)
    {
        let labels = [], values = [];
        let currentMonth = moment().format('MM');

        for (let i = (currentMonth - numberOfMonths); i <= currentMonth; i++) {
            labels.push(i);
            values.push(0);
        }

        results.forEach(function(item) {
            let month = moment(item[column]).format('MM');
            let index = labels.indexOf(parseInt(month));
            values[index]++;
        });

        labels.forEach(function(label, index) {
            labels[index] = moment(label, 'MM').format('MM');
        });

        return {labels, values}
    }
}
