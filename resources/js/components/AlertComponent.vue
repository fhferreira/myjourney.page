<template>
    <transition name="fade">
        <div v-show="visible" class="alert-container" role="alert">
            <div class="container mx-auto px-6">
                <div :class="level" class="alert relative pr-16">
                    <span>{{this.body}}</span>
                    <span @click="hideAlert" role="button" class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20"><title>Close</title><path
                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
                </div>
            </div>
        </div>
    </transition>

</template>
<script>
    export default {
        props: ['message'],
        data: function () {
            return {
                visible: false,
                level: 'success',
                body: this.message
            }
        },
        created() {
            if (this.message) {
                this.flash();
            }
        },
        methods: {
            flash() {
                this.visible = true;
                this.hide();
            },
            hideAlert() {
                this.visible = false
            },
            hide() {
                setTimeout(() => {
                    this.visible = false;
                }, 10000);
            }
        }
    }
</script>
<style>
    .alert-container{
        position: fixed;
        top: 100px;
        left: 50%;
        min-width: 40%;
    }
    .fade-enter-active, .fade-leave-active {
        transition: opacity .2s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }

    @media only screen and (max-width: 768px) {
        .alert-container{
            left: 0;
            right: 0;
            width: 100%;
        }
    }
</style>
