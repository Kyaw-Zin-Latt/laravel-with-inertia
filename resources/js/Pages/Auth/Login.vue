<template>
    <section class="main container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-12 col-mg-6 col-lg-5">
                <div class="my-5">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="" class="w-50" alt="">
                    </div>
                    <div class="border bg-white rounded-lg shadow-sm">
                        <div class="p-4">
                            <h2 class="text-center font-weight-normal">Sign In</h2>
                            <p class="text-center text-black-50 mb-4">
                                Don't have an account yet?
                                <a :href="route('register')">Sign up here</a>
                            </p>
                            <hr class="mb-5">
                            <form @submit.prevent="login()" method="post">

                                <div class="form-group">
                                    <label>User Name</label>
                                    <input v-model="form.email" id="email" type="email" class="form-control form-control-lg" name="email" required autocomplete="email" autofocus>

                                </div>
                                <div class="form-group my-3">
                                    <div class="d-flex justify-content-between">
                                        <label>Password</label>
                                    </div>
                                    <input v-model="form.password" id="password" type="password" class="form-control form-control-lg" name="password" required autocomplete="current-password">

                                </div>
                                <button type="submit" class="w-100 btn btn-lg btn-block btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                form : {
                    email: '',
                    password: '',
                }
            }
        },
        methods: {
            login() {
                this.$inertia.post(route('login'),this.form)
            }
        },
    }
</script>

<style scoped>

</style>
