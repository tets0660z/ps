<template>
  <table>
    <tr v-for="(row, rowKey) in grid" :key="rowKey">
      <th class="row-col-label">{{rowKey+1}}</th>
      <td
        v-for="(col, colKey) in row"
        :key="colKey"
        @click="selectCell(rowKey, colKey)"
        :class="{'selected' : cellSelected(rowKey, colKey)}"
      >{{col}}</td>
    </tr>
  </table>
</template>

<script>
export default {
  props: ["classlists"],
  name: "LecLab5050",
  created() {
    this.initColHead();
    this.createSpreadSheet();
  },
  data() {
    return {
      selected: "",
      grid: [],
      colHead: [" "],
      isSelected: false
    };
  },
  methods: {
    initColHead() {
      this.colHead.push(..."sample".split(""));
    },
    createSpreadSheet() {
      // row
      for (let i = 0; i <= 4; i++) {
        this.grid[i] = [];
        // col
        for (let j = 0; j <= 20; j++) {
          this.grid[i][j] = false;
        }
      }
    },
    selectCell(row, col) {
      const newRow = this.grid[row].slice(0);
      newRow[col] = true;
      this.$set(this.grid, row, newRow);
    },
    cellSelected(row, col) {
      return this.grid[row][col] === true;
    }
  }
};
</script>

<style>
</style>