<template>
    <li>
        <h3>{{ currentClass.name }}</h3>
        <h4>{{ currentClass.meta.role }}</h4>
        <p>{{ currentClass.description }}</p>
        <button @click="isOpen = true; getClassDataFromAPI();"> View Class </button>
        <teleport to="body">
            <div class="modal" v-if="isOpen"> 
                <template v-if="loading">
                    <PulseLoader />
                </template>

                <div v-else>
                    <h2>{{ this.class.name }} Details</h2>
                    <p>{{ this.class.description }}</p>
                    <div class="lists">
                        <ul>
                            <h3>Employees: {{ this.employees.length }}</h3>
                            <li v-for="item in this.employees" :key="item.id" v-bind:currentClass="item">
                                <span>{{ item.title }} {{ item.forename }} {{ item.surname }}</span>
                            </li>
                        </ul>
                        <ul>
                            <h3>Students: {{ this.students.length }}</h3>
                            <li v-for="item in this.students" :key="item.id" v-bind:currentClass="item">
                                <span>{{ item.surname }}, {{ item.forename }}</span>
                                <span>{{ item.data_of_birth }}</span>
                            </li>
                        </ul>
                    </div>
                    <button @click="isOpen = false"> Close </button>
                </div>
            </div>
        </teleport>
    </li>
</template>

<script setup>
    import { ref } from 'vue'

    var isOpen = ref(false)
</script>

<script>
    import axios from 'axios'
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue'
    import sortBy from 'lodash/sortBy'

    export default {
        name: 'ClassItem',

        data() {
            return {
                loading: false,
                noStudents: false,
            }
        },

        props: {
            currentClass: Object
        },

        components: {
            PulseLoader
        },

        methods: {
            getClassDataFromAPI() {
                this.loading = true

                axios.get(`${process.env.VUE_APP_API_URL}/api/schools/A1930499544/classes/${this.currentClass.id}`)
                .then(response => {
                    this.class = response.data.data

                    this.students = sortBy(this.class.students, ['surname', 'forename']);
                    this.employees = sortBy(this.class.employees, ['surname', 'forename']);
                    
                    if (this.students.length === 0) {
                        this.noStudents = true
                    }

                    this.loading = false
                })
                .catch(error => {
                    this.loading = false
                    this.noStudents = true
                    console.log(error)
                })
            }
        }
    }
</script>

<style scoped>
    .root {
        position: relative;
    }

    .modal {
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.1);
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal > div {
        width: 40%;
        background-color: #fff;
        padding: 10px;
        border-radius: 10px;
        text-align: center;
    }

    button:hover {
        background-color: #80071D;
        border-color: #80071D;
    }

    button {
        align-items: center;

        cursor: pointer;
        position: relative;
        font-weight: 400;
        user-select: none;

        margin: 0.1em 0;
        padding: 0.4em;
        border-radius: 0.25em;
        height: 1.5em;

        background-color:#FF4A4A;
        border-color: #FF4A4A;
        color: white;

        text-align:center;
        border-style: none;
        height: 40px;
    }

    .lists {
        max-height: 45rem;
        min-height: 20rem;
        overflow-y: auto;
    }

    ul {
        padding: 1.5rem 1.5rem 1.5rem 4em;
        border: 0.3rem solid #00154A;
        columns: 25rem;
        column-gap: 7rem;
        column-rule: 4px dotted #00154A;
        border-radius: 0.5rem;
        
    }

    ul > * + * {
        margin-top: 1rem;
    }

    ul li {
        break-inside: avoid;
        display:inline-block;
        width:50%;
    }

    ::marker {
        content: none;
    }

    ul li span {
        display: block;
    }

    ul li span:first-child {
        font-size: 1.5em;
    }

    .divider {
        min-height: 6rem;
        background: lavender;
    }
</style>