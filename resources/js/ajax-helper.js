// resources/js/ajax-helper.js

import axios from 'axios';

export function sendAjaxRequest(url, method, data, onSuccess, onError) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Clear previous errors
    document.querySelectorAll('.error').forEach(error => error.textContent = '');
    document.querySelectorAll('.input').forEach(input => input.classList.remove('!ring-red-500'));

    axios({
        method: method,
        url: url,
        data: data,
        headers: {
            'X-CSRF-TOKEN': token,
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (onSuccess) {
            onSuccess(response.data);
        }
    })
    .catch(error => {
        if (onError) {
            onError(error.response ? error.response.data : error);
        }
    });
}
