<template>
    <div>
        <h3 v-model="test"></h3>
    </div>
</template>

<script>
export default {
    data() {
        return {
            test:'Merhaba',

        }
    },
    mounted(){
        this.alert()
    },
    methods:{
        alert(){
            console.log('merhaba dunya')
        }
    }
}
</script>


