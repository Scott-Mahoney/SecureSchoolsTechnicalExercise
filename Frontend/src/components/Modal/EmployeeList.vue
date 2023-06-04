<template>
    <div class="root">
        <button @click="isOpen = true"> Change Employee </button>

        <teleport to="body">
            <div class="modal" v-if="isOpen">
                <div class="employeeContainer">
                    <h2> Change Employee </h2>
                    <div class="lists employees">
                        <ul>
                            <li v-for="item in this.employees"
                                :key="item.id"
                                v-bind:currentClass="item"
                                @click="setSelected(item.id); updateEmployee();"
                            >
                                <span>{{ item.title }} {{ item.forename }} {{ item.surname }}</span>
                            </li>
                        </ul>
                    </div>
                    <button @click="isOpen = false"> Cancel </button>
                </div>
            </div>
        </teleport>
    </div>
</template>

<script setup>
    import { ref } from 'vue'

    const isOpen = ref(false)
</script>

<script>
    export default {
        name: 'EmployeeLists',

        props: {
            employees: Array
        },

        methods: {
            setSelected(id) {
                this.currentlySelected = id
            },
            
            updateEmployee(){
                this.$router.push({ path: '/classes', query: { id: this.currentlySelected } }).then(() => window.location.reload())
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
        text-align: center;
    }

    .modal > div {
        background-color: #fff;
        padding: 50px;
        border-radius: 10px;
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
        max-width: 45rem;
        min-width: 20rem;
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

    ul li :hover {
        cursor: pointer;
        background-color: #80071D;
        border-color: #80071D;
        color: white;
        border-radius: 3px;
    }

    .selected {
        background-color: #FF4A4A;
        border-color: #FF4A4A;
        color: white;
        border-radius: 3px;
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