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

function parseResponse(resp) {
    if (!resp.ok) throw resp;

    return resp;
}

const api = {
    post(path, body) {
        return fetch(`/domaci1/${path}`, { method: 'POST', body }).then(parseResponse);
    },
    delete(path, body) {
        const params = new URLSearchParams();
        for (const key in body) {
            params.append(key, body[key]);
        }
        return fetch(`/domaci1/${path}`, {
            method: 'DELETE', body: params, headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            }
        }).then(parseResponse)
    },
    put(path, body) {
        const params = new URLSearchParams();
        for (const key in body) {
            params.append(key, body[key]);
        }

        console.log(body, params)
        return fetch(`/domaci1/${path}`, {
            method: 'PUT', body: params, headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            }
        }).then(parseResponse)
    }
}


async function deleteBook(bookId) {
    try {
        await api.delete(`/api/books.php`, { id: bookId });
        document.querySelector(`#row-${bookId}`)?.remove();
    } catch (error) {
        console.error(error);
    }
}

async function addBook(event) {
    event?.preventDefault();

    try {
        const formData = new FormData(event.target);
        await api.post(`/api/books.php`, formData);
        window.location.reload();
    } catch (error) {
        console.error(error);
    }
}

function openEditBookModal(id) {
    const book = JSON.parse(document.querySelector(`#row-${id}`).dataset.value);

    document.forms['editBookForm']['id'].value = book.id;
    document.forms['editBookForm']['name'].value = book.name;
    document.forms['editBookForm']['authors'].value = book.authors;
    document.forms['editBookForm']['date_published'].value = book.date_published;
    document.forms['editBookForm']['genre_id'].value = book.genre_id;
    $('#editBookModal').modal('show');
}

async function editBook(event) {
    event?.preventDefault();

    try {
        const formData = new FormData(event.target);
        const data = {};
        formData.forEach(function(value, key){
            data[key] = value;
        });

        await api.put(`/api/books.php`, data);
        window.location.reload();
    } catch (error) {
        console.error(error);
    }
}

async function addGenre(event) {
    event?.preventDefault();

    try {
        const formData = new FormData(event.target);
        await api.post(`/api/genre.php`, formData);
        window.location.reload();
    } catch (error) {
        console.error(error);
    }
}

async function deleteGenre(genreId) {
    try {
        await api.delete(`/api/genre.php`, { id: genreId });
        document.querySelector(`#genre-row-${genreId}`)?.remove();
    } catch (error) {
        console.error(error);
    }
}

function openEditGenreModal(id) {
    const genre = JSON.parse(document.querySelector(`#genre-row-${id}`).dataset.value);

    document.forms['editGenreForm']['id'].value = genre.id;
    document.forms['editGenreForm']['name'].value = genre.name;
    $('#editGenreModal').modal('show');
}

async function editGenre(event) {
    event?.preventDefault();

    try {
        const formData = new FormData(event.target);
        const data = {};
        formData.forEach(function(value, key){
            data[key] = value;
        });

        await api.put(`/api/genre.php`, data);
        window.location.reload();
    } catch (error) {
        console.error(error);
    }
}