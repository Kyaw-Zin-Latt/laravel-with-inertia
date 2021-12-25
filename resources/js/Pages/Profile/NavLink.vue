<template>
    <Link :class="{'text-white' : active}">
        <slot></slot>
    </Link>

</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';
    export default {
        name: "NavLink",
        components : {Link},
        props : {
            active : Boolean
        }
    }
</script>

<style scoped>

</style>
