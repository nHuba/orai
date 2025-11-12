<script>
export default {
//props: ['foodDesc', 'foodName'],
  data(){
    return {
      foods: [ 
        {
          name: 'Alma',
          desc: 'A különböző almák fákon teremnek',
          favorite: true
        },
        {
          name: 'Pizza',
          desc: 'A pizza kenyértészta alapon, paradicsomszósz, sajt és más feltétek.',
          favorite: false
        },
        {
          name: 'Rizs',
          desc: 'A rizs egy gabonaféle, amit sok ember fogyaszt.',
          favorite: false
        },
        {
          name: 'Hal',
          desc: 'A hal egy vízben élő állat.',
          favorite: true
        },
        {
          name: 'Sütemény',
          desc: 'A sütemény édes és nagyon finom.',
          favorite: false
        }
      ]
    };
  },
  methods: {
    removeItem() {
      this.foods.splice(0, 1);
    },
    receiveEmit(foodId) {
      const foundFood = this.foods.find(
        food => food.name === foodId
      )
      foundFood.favorite = !foundFood.favorite;
    }
  }
}
</script>

<template>
  <h1>Ételek</h1>
  <button @click="removeItem">Törlés</button>
  <div id="wrapper">
    <food-item style="width: 220px;"
      v-for="x in foods"
      :key="x.name"
      :food-name="x.name" 
      :food-desc="x.desc" 
      :is-favorite="x.favorite"
      @toggle-favorite="receiveEmit"/>
  </div>
</template>

<style>
  #wrapper {
    display: flex;
    flex-wrap: wrap;
  }

  #wrapper > div {
    border: dashed 1px black;
    margin: 10px;
    padding: 10px;
    background-color: lightgreen;
  }
  
</style>
