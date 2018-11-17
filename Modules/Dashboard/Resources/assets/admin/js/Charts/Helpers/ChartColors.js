let chartColors = {
    red: [255, 99, 132],
    green: [60, 199, 142],
    blue: [54, 162, 235],
    yellow: [255, 207, 86],
    purple: [157, 99, 255],
    orange: [255, 151, 86],
    cyan: [60, 186, 199],
    pink: [255, 99, 184],
};

export default class ChartColors
{
    static getColor(key, alpha) {
        let color = chartColors[key];

        return `rgb(${color[0]}, ${color[1]}, ${color[2]}, ${alpha})`;
    }

    static getColors(keys, alpha) {
        let colors = [];

        keys.forEach(key => {
            colors.push(this.getColor(key, alpha));
        });

        return colors;
    }

    static allColors(alpha) {
        let colors = [];

        for (let key in chartColors) {
            colors.push(this.getColor(key, alpha));
        }

        return colors;
    }
}
