import { ref, computed } from 'vue'

export const collapsed = ref(false)
export const toggleMenubar = () => (collapsed.value = !collapsed.value)

export const MENUBAR_WIDTH = 180
export const MENUBAR_WIDTH_COLLAPSED = 38
export const menubarWidth = computed(
  () => `${collapsed.value ? MENUBAR_WIDTH_COLLAPSED : MENUBAR_WIDTH}px`
)