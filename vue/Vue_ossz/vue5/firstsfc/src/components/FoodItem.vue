<template>
    <div>
        <h2>
            {{ foodName }}
            <img src="../img_quality.svg" v-show="isFavorite">
            <p>{{ foodDesc }}</p>
            <button @click="toggleFavorite">Kedvenc</button>
        </h2>
    </div>
</template>

<script>
export default {

    props: ['foodName', 'foodDesc', 'isFavorite'],
    emits: ['toggle-favorite'],
    methods: {
        toggleFavorite() {
            //this.foodIsFavorite = !this.foodIsFavorite;
            this.$emit('toggle-favorite', this.foodName);
        }
    }
    /* 
    props: {
        foodName: {
            type: String,
            required: true
        },
        foodDesc: 
        {
            type: String,
            required: false,
            default: 'Ennek az ételnek nincs leírása.',
            validator: function(value){
                if (20 < value.lenght && value.lenght < 50){
                    return true;
                }
                else {
                    return false;
                }
            }
        },
        isFavorite: {
            type: Boolean,
            required: false,
            default: false
        }
    },
    data() {
        return {
            foodIsFavorite: this.isFavorite
        };
    },
    methods: {
        toggleFavorite() {
            this.foodIsFavorite = !this.foodIsFavorite;
        }
    }*/
}
</script>

<style>
    img {
        height: 1.5em;
        float: right;
    }
</style>