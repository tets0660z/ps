<template>
  <div>
    <div class="mb-2">
      <input type="text" placeholder="Search" />
    </div>
    <form @submit.prevent="insertLaboratory">
      <table border="1" class="table-hover">
        <thead></thead>
        <tbody>
          <tr v-for="(classlist,index) in classlists" :key="'lab'+ classlist.id">
            <td>{{index +1}}</td>
            <td>
              <span>{{classlist.student}}</span>
            </td>
            <button type="button" @click="addScore(index)">score(+)</button>

            <td v-for="(labStudentScore,i) in form.labStudentScores" :key="i">
              <input
                v-model="labStudentScore.value[index]"
                @mouseover="col"
                v-on:keyup="emitToClassrecord"
              />
            </td>

            <td>{{studentTotalScores}}</td>
          </tr>
          <!-- ./MALE -->
        </tbody>
      </table>
    </form>
  </div>
</template>

<script>
export default {
  props: ["classlists"],
  data() {
    return {
      form: new Form({
        labStudentScores: [],
        studentExam: 0
      })
    };
  },

  methods: {
    // referenced to classrecord.
    emitToClassrecord(value) {
      this.$emit("insert-student-score", this.form.labStudentScores);
      // alert("asd");
    },
    addScore: function(index) {
      this.form.labStudentScores.push({ value: [] });
    },
    col: function(e) {
      let x = e.target.selectedIndex;
      console.log(x);
    }
  },
  computed: {
    studentTotalScores: function() {
      return this.form.labStudentScores.reduce(
        (acc, item) => acc + parseInt(item.value),
        0
      );
    },
    studentTotal: function() {
      return parseInt(this.form.studentExam) + this.studentTotalScores;
    }
  }
};
</script>

<style scoped>
.legend {
  border: 0;
  background-color: transparent;
  font-family: "Times New Roman";
}

.quiz {
  width: 30px;
}
/* input[type="date"] {
  transform: rotate(-90deg);
} */
.btn-primary {
  width: 50px;
  height: 50px;
  padding: 10px;
}
</style>  