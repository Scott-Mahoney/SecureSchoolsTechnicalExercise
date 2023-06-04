<script>
import MenubarLink from './MenubarLink'
import { collapsed, toggleMenubar, menubarWidth } from './state'
export default {
    props: {},
    components: { MenubarLink },
    setup() {
        return { collapsed, toggleMenubar, menubarWidth }
    },
    mounted() {
        setTimeout(() => {  toggleMenubar() }, 1000)
    }
}
</script>

<template>
    <div class="menubar" :style="{ width: menubarWidth }">
        <h1>
            <span v-if="collapsed">
            <img class="collapsedLogo" alt="Secure Schools Logo" src="https://secureschools.com/svg/logo.svg" />
            </span>
            <span v-else>Secure Schools Technical Test</span>
        </h1>

        <MenubarLink to="/" icon="fas fa-school">Home</MenubarLink>
        <MenubarLink to="/classes" icon="fas fa-chalkboard-user">Classes</MenubarLink>
        <MenubarLink to="/other" icon="fas fa-columns">Other</MenubarLink>
        <MenubarLink to="/pages" icon="fas fa-chart-bar">Pages</MenubarLink>
        <MenubarLink to="/in" icon="fas fa-users">In</MenubarLink>
        <MenubarLink to="/the" icon="fas fa-gift">The</MenubarLink>
        <MenubarLink to="/app" icon="fas fa-gear">App</MenubarLink>

        <span
            class="collapse-icon"
            :class="{ 'rotate-180': collapsed }"
            @click="toggleMenubar"
        >
            <i class="fas fa-angle-double-left" />
        </span>
    </div>
</template>

<style>
:root {
    --menubar-bg-color: #00154A;
    --menubar-item-hover: #80071D;
    --menubar-item-active: #FF4A4A;
}
</style>

<style scoped>
.menubar {
    color: white;
    background-color: var(--menubar-bg-color);
    float: left;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    bottom: 0;
    padding: 0.5em;
    transition: 0.3s ease;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}
.menubar h1 {
    height: 4em;
}
.collapse-icon {
    position: absolute;
    bottom: 0;
    padding: 0.75em;
    color: rgba(255, 255, 255, 0.7);
    transition: 0.2s linear;
}
.rotate-180 {
    transform: rotate(180deg);
    transition: 0.2s linear;
}
.collapsedLogo {
    position: relative;
    margin-left: 3px;
}
</style>