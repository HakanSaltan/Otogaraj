<template>
<div>
    <div class="card card-custom card-stretch gutter-b">
        <h2 v-text="mesaj"></h2>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            mesaj:'Merhaba'
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


