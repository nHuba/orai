new Vue({
    el: '#app',
    data: {
        hello: 'Hello World!',
        tooltip: 'This is a tooltip!',
        color: 'blueText',
        fontweight: 'boldText',
        styleObject:{
            color: 'green',
            fontSize: '20px'
        },
        myHeader: '<h2>My Header</h2>',
        showHelloWorld: true,
        a: -5,
        fruits: ['Apple', 'Banana', 'Orange'],
        person: {
            firstName: 'Csaba',
            lastname: 'Toth',
            age: 30
        },
        counter: 0,
        mouseEventStatus: 'start',
        inputText: "Hello world!"
    },
    created: function() {
       this.reverseHello = this.hello.split('').reverse().join('');
    },
    methods: {
        /*reverseHello: function() {
            return this.hello.split('').reverse().join('');
        },*/
        capitalizeHello: function() {
            return this.hello.toUpperCase();
        },
        add: function(a, b){
            return a + b;
        },
        /*
        addOne: function(){
            this.counter += 1;
        }*/
        addOne(event){
            console.log(event);
            this.counter += 1;
        },

         addSome(ValueToAdd){
            this.counter += ValueToAdd;
        },
        addOne2(event){
            if(event){
                event.preventDefault();
            }
            this.counter += 1;
        },

        performMouseOver(){
            this.mouseEventStatus = 'Mouse Over Event';
        },

        performMouseOut(){
            this.mouseEventStatus = 'Mouse Out Event';
        }

    },
   computed:{
    reverseHello() {
        return this.hello.split('').reverse().join(''); //adatként tárolódik és nem függvényként hívódik
    }
   }
})