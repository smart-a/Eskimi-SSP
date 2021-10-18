<template>
    <button @click="onClick" class="mr-2 btn-dark btn-sm">Preview ({{this.num}})</button>
</template>

<script>
export default{
    props: ['num'],
    methods: {
        onClick(){
            this.$emit('handleClick');
        }
    }
}
</script>
