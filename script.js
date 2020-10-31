
function changeSort(orderBy) {
    const query = new URLSearchParams(window.location.search);

    const currentOrderBy = query.get('order_by');
    const currentOrderDir = query.get('order_dir');

    let newOrderDir;

    if (currentOrderBy === orderBy) {
        if (currentOrderDir === 'asc') newOrderDir = 'desc';
        else newOrderDir = 'asc'
    } else {
        newOrderDir = 'asc';
    }

    query.set('order_by', orderBy);
    query.set('order_dir', newOrderDir);

    window.location.replace(window.location.pathname.concat('?', query.toString()))
}