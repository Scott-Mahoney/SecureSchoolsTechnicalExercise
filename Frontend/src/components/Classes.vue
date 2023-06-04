import Menubar from '@/components/MenuBar/Menubar'

<template>
  <div class="classes">
    <template v-if="loading">
      <PulseLoader />
    </template>
    
    <template v-else-if="noClasses">
      <h1>{{ this.currentEmployee.title }} {{ this.currentEmployee.forename }} {{ this.currentEmployee.surname }} currently has no classes</h1>
      <EmployeeLists v-bind:employees="employeeList" />
    </template>

    <template v-else>
      <h1>Classes for {{ this.currentEmployee.title }} {{ this.currentEmployee.forename }} {{ this.currentEmployee.surname }}</h1>
      <EmployeeLists v-bind:employees="employeeList" />
      <ol class="classList">
        <ClassItem v-for="item in this.currentClasses" :key="item.id" v-bind:currentClass="item" />
      </ol>
    </template>
  </div>
</template>

<script>
import axios from 'axios'
import ClassItem from '@/components/ClassItem.vue'
import EmployeeLists from '@/components/Modal/EmployeeList.vue'
import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

export default {
  name: 'Class',
  data() {
    return {
      loading: false,
      noClasses: false,
      idValue: 0,
    }
  },

  props: {
    currentID: String,
  },

  components: {
    PulseLoader,
    EmployeeLists,
    ClassItem
  },

  created() {
    this.getDataFromApi()
  },

  methods: {
    getDataFromApi() {
      this.loading = true
      axios.get(`${process.env.VUE_APP_API_URL}/api/schools/A1930499544/employees`)
      .then(response => {
        this.employeeList = response.data.data
        this.currentEmployee = this.employeeList.find(employee => employee.id === this.currentID)

        if (!this.currentEmployee) {
          this.currentEmployee = this.employeeList[0]
        }

        this.currentClasses = this.currentEmployee.classes

        if (this.currentClasses.length === 0) {
          this.noClasses = true
        }

        this.loading = false
      })
      .catch(error => {
        this.loading = false
        this.noClasses = true
        console.log(error)
      })
    }
  }
}
</script>

<style scoped>
ol {
	list-style: none;
	counter-reset: list;
	padding: 0 1rem;
}

li {
	position: relative;
	counter-increment: list;
	max-width: 45rem;
  min-width: 20rem;
	margin: 2rem auto;
  margin-right:10px;
	padding: 2rem 1rem 1rem;
	box-shadow: 0.1rem 0.1rem 1.5rem rgba(0, 0, 0, 0.3);
	border-radius: 0.25rem;
	overflow: hidden;
	background-color: white;
  display:inline-block;
}

li::before {
	content: '';
	display: block;
	width: 100%;
	height: 1rem;
	position: absolute;
	top: 0;
	left: 0;
	background: linear-gradient(to right, var(--c1) var(--stop), var(--c2) var(--stop));
}

h3 {
	display: flex;
	align-items: baseline;
	margin: 0 0 1rem;
	color: rgb(70 70 70);
}

h3::before {
	display: flex;
	justify-content: center;
	align-items: center;
	flex: 0 0 auto;
	margin-right: 1rem;
	width: 3rem;
	height: 3rem;
	content: counter(list);
	padding: 1rem;
	border-radius: 50%;
	background-color: var(--c1);
	color: white;
}
</style>
