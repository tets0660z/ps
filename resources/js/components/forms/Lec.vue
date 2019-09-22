<template>
  <div>
    <div class="mb-2">
      <label for="score">Add Score:</label>
      <button type="button" @click="addScore">FG(+)</button>
    </div>

    <form @submit.prevent="insertScore">
      <table border="1" class="table-hover">
        <thead>
          <tr>
            <th colspan="4"></th>
            <th></th>
          </tr>
          <tr>
            <th>#</th>
            <th>ID Number</th>
            <th>Name</th>
            <th>Course</th>
            <th v-for="(title,index) in titles" :key="index">
              <input v-model="title.titles" class="quiz d-flex" name="titleszz" />
            </th>
            <th>Total</th>
            <th>1st Grading</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th colspan="4" class="text-center bg-primary">Male</th>
            <td v-for="(overAllScore,index) in overAll" :key="index">
              <input v-model="overAllScore.underScore" class="quiz d-flex" name="labScore" />
            </td>
            <th>{{overAll}}</th>
            <td></td>
          </tr>

          <!-- ./ first row  -->

          <tr
            v-for="(classlist,index) in classlists"
            :key="'labm'+ classlist.id"
            v-show="classlist.gender ==='male'"
          >
            <td>
              <input type="text" v-model="classlist.id" />
            </td>
            <td></td>
            <td>
              {{classlist.student}}
              <input type="text" v-model="classlist.id" hidden />
            </td>
            <td>{{classlist.course}}</td>
            <td v-for="(labStudentScore,i) in labStudentScores" :key="i">
              <input v-model="labStudentScore.studentScores[index]" name="student_scores" />
              <input type="text" :value="index" name="gridRowMale" hidden />
              <input type="text" :value="i" name="gridColMale" hidden />
            </td>

            <td>{{studentTotalScores[index]}}</td>
          </tr>
          <!-- ./MALE -->
          <tr>
            <th colspan="4" class="text-center bg-primary">Female</th>
            <td v-for="(overAllScore,index) in overAllScores" :key="index">
              <input v-model="overAllScore.underScore" class="quiz d-flex" name="over_all_scores" />
            </td>
            <th>{{overAllScores}}</th>
            <td></td>
          </tr>

          <!-- ./ first row  -->

          <tr
            v-for="(classlist,index) in classlists"
            :key="'labf'+ classlist.id"
            v-show="classlist.gender ==='female'"
          >
            <td>{{index +1}}</td>
            <td></td>
            <td>{{classlist.student}}</td>
            <td>{{classlist.course}}</td>
            <td v-for="(labStudentScore,i) in labStudentScores" :key="i">
              <input v-model="labStudentScore.studentScores[index]" name="labStudentScore" />
              <input type="text" :value="index" name="gridRowFemale" hidden />
              <input type="text" :value="i" name="gridColFemale" hidden />
              <input type="text" :value="classlist.id" name="studentId" hidden />
            </td>

            <td>{{studentTotalScores[index]}}</td>
          </tr>
          <!-- ./FEMALE -->
        </tbody>
      </table>
      <button type="submit">save</button>
    </form>
    <div class="row">
      <div class="col-lg-6">Legend</div>
      <div class="col-lg-6">
        <!-- <Accordion></Accordion> -->
      </div>
    </div>
  </div>
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