<template>
  <div class="container">
    <h1>Class Record</h1>
    <span
      class="tab"
      :class="{ activeTab: selectedTab === tab }"
      v-for="(tab, index) in tabs"
      :key="index"
      @click="selectedTab = tab"
    >{{ tab }}</span>
    <lec v-show="selectedTab === 'Lec'"></lec>
    <lab v-show="selectedTab === 'Lab'"></lab>
    <LecLab4060 v-show="selectedTab === 'Lec-Lab40-60'"></LecLab4060>
    <LecLab5050 v-show="selectedTab === 'Lec-Lab50-50'"></LecLab5050>
    <LecLab6040 v-show="selectedTab === 'Lec-Lab60-40'"></LecLab6040>
  </div>
</template>

<script>
import Lec from "./forms/Lec";
import Lab from "./forms/Lab";
import LecLab4060 from "./forms/LecLab4060";
import LecLab5050 from "./forms/LecLab5050";
import LecLab6040 from "./forms/LecLab6040";

export default {
  props: Lec,
  data() {
    return {
      tabs: ["Lec", "Lab", "Lec-Lab40-60", "Lec-Lab50-50", "Lec-Lab60-40"],
      selectedTab: "Lec"
    };
  },
  components: {
    Lec,
    Lab,
    LecLab4060,
    LecLab5050,
    LecLab6040
  }
};
</script>

<style scoped>
.activeTab {
  color: rgb(226, 115, 11);
  cursor: pointer;
  border-bottom: 1px solid rgb(226, 115, 11);
}
.tab {
  cursor: pointer;
  padding: 6px;
}
</style>