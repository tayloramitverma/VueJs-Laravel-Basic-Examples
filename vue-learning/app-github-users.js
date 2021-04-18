Vue.component('github-user-card', {
	template: '#github-user-profile-template',
	props:{
		username:{
			type:String,
			required: true
		}
	},
	data(){
		return{
			user:{}
		}
	},
	created(){
		axios.get('https://api.github.com/users/'+this.username)
		.then(response => {
			this.user = response.data
		})
	}

});


new Vue({
	el: '#app',
	data(){
		return {
			users:{}
		}
	},
	created(){
		axios.get('https://api.github.com/users')
		.then(response => {
			this.users = response.data
		})
	}
})