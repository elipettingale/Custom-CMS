import PublishedPostsByMonthChart from './Charts/PublishedPostsByMonthChart';
import PostsByCategoryChart from './Charts/PostsByCategoryChart';
import UsersByActivityChart from "./Charts/UsersByActivityChart";

new PublishedPostsByMonthChart(
    $('#published-posts-by-month')
);

new PostsByCategoryChart(
    $('#posts-by-category')
);

new UsersByActivityChart(
    $('#users-by-activity')
);
