<template>
    <div class="auth-fluid">
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">
                    <div class="auth-brand text-center text-lg-start">
                        <span><img src="https://laravel.com/img/logomark.min.svg"></span>
                    </div>
                    <h4 class="mt-0">Login</h4>
                    <div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="email" id="email" v-model="form.email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" v-model="form.password">
                        </div>
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary" @click="login">
                                <i class="mdi mdi-login"></i>
                                Login
                            </button>
                            <router-link :to="{name: 'register'}" class="btn btn-success mt-1">
                                <i class="mdi mdi-pencil"></i>
                                Register
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            form: {
                email: '',
                password: ''
            },
        }
    },
    created() {
        this.setCSRF();
    },
    methods: {
        setCSRF() {
            axios.get('sanctum/csrf-cookie', {baseURL: '/'});
        },
        login() {
            axios.post('login', this.form)
                .then(response => {
                    this.$router.push({name: 'dashboard'});
                    location.reload()
                })
                .catch(error => {
                    this.$root.errorHandler(error);
                });
        }
    }
}
</script>

<style scoped>

</style>
