import firebase from 'firebase'
import 'firebase/firebase'

// firebase init goes here

const config = {
  apiKey: 'AIzaSyAsdVxKIYiCXyExmdNyFUDa-7vLxwqhchU',
  authDomain: 'vuedemo-75062.firebaseapp.com',
  databaseURL: 'https://vuedemo-75062.firebaseio.com',
  projectId: 'vuedemo-75062',
  storageBucket: 'vuedemo-75062.appspot.com',
  messagingSenderId: '467655479185',
  appId: '1:467655479185:web:eefee012954f34427f5430',
  measurementId: 'G-Y42KJLSSN3'
}

firebase.initializeApp(config)

// firebase utils
const db = firebase.firestore()
const auth = firebase.auth()
const currentUser = auth.currentUser

// date issue fix according to firebase
const settings = {
  timestampsInSnapshots: true
}
db.settings(settings)

// firebase collections
const usersCollection = db.collection('users')
const postsCollection = db.collection('posts')
const commentsCollection = db.collection('comments')
const likesCollection = db.collection('likes')

export {
  db,
  auth,
  currentUser,
  usersCollection,
  postsCollection,
  commentsCollection,
  likesCollection
}
