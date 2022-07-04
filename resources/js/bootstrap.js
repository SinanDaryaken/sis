window._ = require('lodash');

const qs = require('qs');

window.axios = require('axios');
window.axios.defaults.baseURL = "/api";
window.axios.defaults.withCredentials = true;
window.axios.defaults.paramsSerializer = params => qs.stringify(params, { arrayFormat: 'brackets' });
