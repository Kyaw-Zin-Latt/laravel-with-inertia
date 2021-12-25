<template>
    <Nav></Nav>
    <div class="container">
        <div class="row">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    import Nav from "@/Pages/Nav";
    export default {
        name: "Layout",
        components: {Nav},

    }
</script>

<style scoped>

</style>
