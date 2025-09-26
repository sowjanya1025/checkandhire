require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue'
 
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

import Toaster from 'v-toaster'
Vue.use(Toaster, {timeout: 5000})
import 'v-toaster/dist/v-toaster.css'


Vue.component('message', require('./components/ExampleComponent.vue').default);
Vue.component('image-component', require('./components/ImageComponent.vue').default);

const app = new Vue({
    el: '#app',
    data:{
        message:'',
        chat:{
            message:[],
            user:[],
            color:[],
            time:[]
            },
            typing:'',
            numberOfUsers:0
        },
        watch:{
        message(){
                Echo.private('chat')
                .whisper('typing', {
                name: this.message
                });
            }                 
    },
    methods:{        
        send(){
            if(this.message.length != 0){
            this.chat.message.push(this.message);               
            this.chat.color.push('success');       
            this.chat.user.push('you');                   
            this.chat.time.push(this.getTime());                               
            axios.post('/send/:id', {
                message : this.message,      
                chat:this.chat
                
              })
              .then(response =>{
                console.log(response);
                this.message = '';                
              })
              .catch(error => {
                console.log(error);
              });                            
            }
        },
        getTime(){
            let time = new Date();
            return time.getHours()+':'+time.getMinutes();
        },
        getOldMessage(){
            axios.post('/getOldMessage')
            .then(response =>{
                console.log(response.data);    
                if(response.data != ''){
                    this.chat = response.data;
                }
            })
            .catch(error => {
                console.log(error);
            });
        },
        enterIntoChat(id){
            axios.post('/chat',  {
                id : id,
            })                                        
           .then(response =>{
                console.log(response.data);    
                if(response.data != ''){
                    this.chat = response.data;
                }
            })
            .catch(error => {
                console.log(error);
            });
        }
    },    
    mounted(){
        this.getOldMessage();
        Echo.private('chat')
            .listen('ChatEvent', (e) => {
                this.chat.message.push(e.message);                      
                this.chat.user.push(e.user);                  
                this.chat.color.push('primary');                  
                axios.post('/saveToSession', {
                    chat : this.chat,
                })
                .then(response =>{
                    console.log(e.message);                        
                })
                .catch(error => {
                    console.log(error);
                });            
            })
            
            .listenForWhisper('typing', (e) => {
                if(e.name != ''){
                    this.typing = 'typing....'
                }else{
                    this.typing = ''
                }
            })
            Echo.join('chat')
            .here((users) => {
                this.numberOfUsers = users.length;
                // console.log(users);
            })
            .joining((user) => {
                this.numberOfUsers +=1;                
                this.$toaster.success(user.name + ' Joined The Room')

            })
            .leaving((user) => {
                this.numberOfUsers -=1;
                this.$toaster.success(user.name + ' Leave The Room')
            });
    }   
});
