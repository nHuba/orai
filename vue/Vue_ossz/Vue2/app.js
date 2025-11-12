let myMixin = {
    created(){
        this.hello()
    },
    methods: {
        hello(){
            console.log('Hello from mixin!')
        }
    }
}

/* 
Vue.component('button-counter', {
  props: ['counter'],
  template: `<div>
                <button @click="$emit('add-some', 1)">Counter: {{ counter }}</button>
                <button @click="$emit('add-some', 5)">Counter: {{ counter }}</button>
            </div>`
})
*/

Vue.component('button-counter', {
  mixins: [myMixin],
  data() {
    return {
        counter: 0
    }
  },
  template: `<div>
                <button @click="counter += 1">Add 1, Counter: {{ counter }}</button>
            </div>`
})


/*
Vue.component('button-counter', {
  data: function () {
    return {
        counter: 0
    }
},
template: '<div><button v-on:click="counter += 1">You clicked me {{ counter }} times.</button></div>'
})*/

/*
Vue.component('component-a', {
    template: '<div>Component A</div>'
})

Vue.component('component-b', {
    template: '<div><component-a></component-a>Component B</div>' //egymásba ágyazás
})

Vue.component('component-c', {
    template: '<div>Component C</div>'
})


let ComponentA = {
    template: '<div>Component A</div>'
}
let ComponentB = {
    template: '<div>Component B</div>'
}

let ComponentC = {
    template: '<div>Component C</div>'
}

Vue.component('hello-user', {
    props:{
        name: {
            type: String,
            required: true,
            default: 'Csaba'
        }
    },
    template: '<div>Hello {{ name }}!</div>'
})
*/
Vue.component('custom-input', {
    props: ['value'],
    template: `
        <input :value="value" @input="$emit('input', $event.target.value)">
        `
})

Vue.component('hello-user', {
    props: ['name'],
    template: '<div>Hello, <slot></slot>!</div>'
})



let app = new Vue({
  el: '#app',
  data: {
    inputText: 'Hello, world!',
    name: 'Alice'
  }
/*  components: {
    'component-a': ComponentA,
    'component-b': ComponentB, //c nincs engedélyezve
  },
  data: {
    name: 'John',
    counter: 0
  },
  methods: {
    addSome(valueToAdd){
        this.counter += valueToAdd
    }
  }*/
})
