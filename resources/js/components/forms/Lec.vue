<template>
  <div></div>
</template>

<script>
export default {
  props: ["classlists"],

  data() {
    return {
      labStudentScores: [],
      titles: [],
      overAllScores: [],
      studentId: [],
      studentId: ""
    };
  },
  methods: {
    insertScore() {
      let students = this.classlists;
      let element = ""; //student_id
      // const type = "lec";

      for (let index = 0; index < students.length; index++) {
        for (let i = 0; i <= index; i++) {
          element = students[index].id;
        }
        axios
          .post("/api/lec/" + element)
          .then(response => (students = response));
      }
      //./imported_classlists_id
    },
    addScore: function() {
      this.labStudentScores.push({ studentScores: [] });
      this.titles.push({ titles: [] });
      this.overAllScores.push({ underScore: [] });
    }
  },
  computed: {
    studentTotalScores: function() {
      return this.classlists.map((c, index) => {
        return this.labStudentScores.reduce((acc, item) => {
          const value = parseInt(item.studentScores[index], 10) || 0;
          return acc + value;
        }, 0);
      });
    },
    overAll: function() {
      return this.overAllScores.reduce(
        (acc, item) => acc + parseInt(item.underScore, 10) || 0,
        0
      );
    },

    studentTotal: function() {
      return parseInt(this.studentExam) + this.studentTotalScores;
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

input {
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