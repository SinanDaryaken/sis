<template>
    <div class="auth-fluid">
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">
                    <div class="auth-brand text-center text-lg-start">
                        <span><img src="https://laravel.com/img/logomark.min.svg"></span>
                    </div>
                    <h4 class="mt-0">Register</h4>
                    <div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" type="text" id="name" v-model="form.name">
                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Surname</label>
                            <input class="form-control" type="text" id="surname" v-model="form.surname">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="email" id="email" v-model="form.email">
                        </div>
                        <div class="mb-3">
                            <label for="uid" class="form-label">Student Identification Code</label>
                            <input class="form-control" type="text" id="uid" v-model="form.uid">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" v-model="form.password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="password" class="form-control" id="password_confirmation" v-model="form.password_confirmation">
                        </div>
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary" @click="register">
                                <i class="mdi mdi-login"></i>
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Register",
    data() {
        return {
            form: {
                name: '',
                surname: '',
                email: '',
                uid: '',
                password: '',
                password_confirmation: ''
            },
        }
    },
    methods: {
        register() {
            axios.post('register', this.form)
                .then(response => {
                    this.$router.push({name: 'dashboard'});
                })
                .catch(error => {
                    this.$root.errorHandler(error);
                });
        },
    }
}
</script>

<style scoped>

</style>
