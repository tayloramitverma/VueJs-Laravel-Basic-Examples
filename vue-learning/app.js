Vue.component('todo-item', {
  props: ['todo'],
  template: '<li>{{todo.text}}</li>'
})

var obj = {
  foo: 'bar'
}


var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    groceryList: [
      { id: 0, text: 'Vegetables' },
      { id: 1, text: 'Cheese' },
      { id: 2, text: 'Whatever else humans are supposed to eat' }
    ],
    obj,
    firstName: 'Foo',
    lastName: 'Bar',
    isActive : true,
    hasError : false,
    items: [
      { message: 'Foo' },
      { message: 'Bar' }
    ],
    userProfile: {
      name: 'Anika'
    },
    numbers:[1,2,3,4,5,6]
  },
  methods : {

    reverseMessage: function(){
      this.message = this.message.split('').reverse().join('').toUpperCase();
    },

    reverseMessageIs : function(){
      return this.message.toUpperCase();
    },
    changeitNow : function(){
      this.isActive = !this.isActive;
      this.hasError = !this.hasError;
    }

  },
  computed : {
    reverseMessageIs : function(){
      return this.message.toUpperCase();
    },
    now: function () {
      return Date.now()
    },
    fullName: {
      // getter
      get: function () {
        return this.firstName.toUpperCase() + ' ' + this.lastName.toUpperCase()
      },
      // setter
      set: function (newValue) {
        var names = newValue.split(' ')
        this.firstName = names[0]
        this.lastName = names[names.length - 1]
      }
    },
    evenNumbers: function(){
      return this.numbers.filter(function(number){
        return number % 2 === 0
      });
    }
  },
  watch: {

  },
  created: function(){
    console.log('Message is:' + this.message)
  }
});

//app.items.push({ message: 'Avv' });

app.items = app.items.filter(function (item) {
  return item.message.match(/Foo/)
});

Vue.set(app.userProfile, 'age', 27);

app.userProfile = Object.assign({}, app.userProfile, {
  age: 28,
  favoriteColor: 'Vue Green'
})

console.log(app.userProfile);



Vue.component('todo-item', {
  template: `
    <li>
      {{ title }}
      <button v-on:click="$emit('checkme')" >Remove</button>
    </li>`,
  props: ['title']
})

new Vue({
  el: '#todo-list-example',
  data: {
    newTodoText: '',
    todos: [
      {
        id: 1,
        title: 'Do the dishes',
      },
      {
        id: 2,
        title: 'Take out the trash',
      },
      {
        id: 3,
        title: 'Mow the lawn'
      }
    ],
    nextTodoId: 4
  },
  methods: {
    addNewTodo: function () {
      this.todos.push({
        id: this.nextTodoId++,
        title: this.newTodoText
      })
      this.newTodoText = ''
    },

    alertMe: function(index){
      alert(index);
      this.todos.splice(index, 1);
    }
  }
})


/*
var app2 = new Vue({
  el: '#app-2',
  data: obj
});


var watchExampleVM = new Vue({
  el: '#watch-example',
  data: {
    question: '',
    answer: 'I cannot give you an answer until you ask a question!'
  },
  watch: {
    // whenever question changes, this function will run
    question: function (newQuestion, oldQuestion) {
      this.answer = 'Waiting for you to stop typing...'
      this.debouncedGetAnswer()
    }
  },
  created: function () {
    // _.debounce is a function provided by lodash to limit how
    // often a particularly expensive operation can be run.
    // In this case, we want to limit how often we access
    // yesno.wtf/api, waiting until the user has completely
    // finished typing before making the ajax request. To learn
    // more about the _.debounce function (and its cousin
    // _.throttle), visit: https://lodash.com/docs#debounce
    this.debouncedGetAnswer = _.debounce(this.getAnswer, 500)
  },
  methods: {

    getAnswer: function () {
      if (this.question.indexOf('?') === -1) {
        this.answer = 'Questions usually contain a question mark. ;-)'
        return
      }
      this.answer = 'Thinking...'
      var vm = this
      axios.get('https://yesno.wtf/api')
        .then(function (response) {
          vm.answer = _.capitalize(response.data.answer)
        })
        .catch(function (error) {
          vm.answer = 'Error! Could not reach the API. ' + error
        })
    }

  }

});*/