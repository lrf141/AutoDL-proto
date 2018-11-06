<template>
    <editor v-model="content" @init="editorInit" lang="python" theme="chrome" style="width: 100%; height: 500px;"></editor>
</template>

<script>
    export default {
        name: "codearea",
        components: {
            editor: require('vue2-ace-editor'),
        },
        methods: {
            editorInit: function () {
                require('brace/ext/language_tools'); //language extension prerequsite...)
                require('brace/mode/python');   //language
                require('brace/theme/chrome');
                //require('brace/snippets/python'); //snippet
            }
        },
    }
</script>

<style scoped>

</style>