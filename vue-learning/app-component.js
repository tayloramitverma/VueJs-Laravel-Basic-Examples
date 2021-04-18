/*Vue.component('counter-view', {
	template: `<p @click="counter++">{{counter}}</p>`,
	data(){
		return {
			counter:0
		}
	}
});*/


/*Vue.component('counter-view', {
	template: '#counter-view-template',
	data(){
		return {
			counter:0
		}
	}
});*/


Vue.component('base-checkbox', {
  model: {
    prop: 'checked',
    event: 'change'
  },
  props: {
    checked: Boolean
  },
  template: `
    <input
      type="checkbox"
      v-bind:checked="checked"
      v-on:change="$emit('change', $event.target.checked)"
    >
  `
})




// PlanItemComponent is Child Component for PlanPickerComponent

let PlanPickerItemComponent = {
	template:'#plan-picker-item-template',
	props: ['name', 'keyin', 'selectedPlan'],
	computed: {
		isSelected(){
			return  this.name === this.selectedPlan
		}
	},
	methods: {
		selectMe(){
			this.$emit('selectAV', this.name)
		}
	}
}

//PlanPickerComponent is Parent Component for PlanItemComponent

let PlanPickerComponent = {
	template: '#plan-picker-template',
	components: {
		'plan-picker-item': PlanPickerItemComponent
	},
	data(){
		return {
			plans: ['This', 'is', 'testing'],
			selectedPlan: null
		}
	},
	methods:{
		SelectPlan(plan){
			this.selectedPlan = plan
		}
	}
}


//BlogPostComponent using axios function


let BlogPostComponent = {

	template: `<div>{{blogpost}}

			<header>
				<slot name="header"></slot>
			</header>
			<main>
				<slot></slot>
			</main>
			<footer>
				<slot name="footer"></slot>
			</footer>
	</div>`,
	props: ['id'],
	data() {
		return{
			blogpost : null
		}
	},
	created () {
		axios.get('http://dummy.restapiexample.com/api/v1/employee/'+ this.id).then( response => {
			this.blogpost = response.data

			console.log(this.blogpost)
		})
	}

}




new Vue({
	el: '#app',
	components:{
		'plan-picker': PlanPickerComponent,
		'plan-picker-item': PlanPickerItemComponent,
		'blog-post' : BlogPostComponent
	}
})