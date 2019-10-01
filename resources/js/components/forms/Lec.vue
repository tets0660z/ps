<template>
  <div>
    <div class="mb-2">
      <h1>First Grading</h1>
    </div>
    <!-- {{form.titles}} -->
    <form @submit.prevent="insertScore">
      <table border="1" class="table-hover">
        <thead>
          <tr>
            <th colspan="4"></th>
            <th :colspan="countQuiz">
              <button type="button" @click="addQuiz">Quiz +</button>
            </th>
            <th :colspan="countOthers">
              <button type="button" @click="addOthers">others +</button>
            </th>
            <th></th>
          </tr>
          <tr>
            <th>#</th>
            <th>ID Number</th>
            <th>Name</th>
            <th>Course</th>
            <th v-for="(title,index) in form.titles" :key="index">
              <input v-model="title.titles" class="quiz d-flex" />
            </th>
            <th>QT</th>
            <!-- Others Title -->
            <th v-for="(otherTitle,index) in form.othersTitle" :key="index+'others'">
              <input v-model="otherTitle.titles" class="quiz d-flex" />
            </th>

            <th>OT</th>
            <th>TOTAL</th>
            <th>GRADE</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th colspan="4" class="text-center bg-primary">Male</th>
            <td v-for="(overAllScore,index) in form.overAllScores" :key="index">
              <input v-model="overAllScore.underScore" class="quiz d-flex" />
            </td>
            <th>{{overAllScores}}</th>
            <td v-for="(overAllScore,index) in form.othersOverAllScores" :key="index + 'others'">
              <input v-model="overAllScore.underScore" class="quiz d-flex" />
            </td>
            <td>{{othersoverAllScores}}</td>
            <td class="text-center">{{othersoverAllScores + overAllScores}}</td>
          </tr>

          <!-- ./ first row  -->

          <tr
            v-for="(classlist,index) in classlists"
            :key="index + 'lab'"
            v-show="classlist.gender === 'male'"
          >
            <td>
              <input type="text" v-model="classlist.id" />
            </td>
            <td></td>
            <td>
              {{classlist.name}}
              <input type="text" v-model="classlist.id" hidden />
            </td>
            <td>{{classlist.course}}</td>
            <td v-for="(labStudentScore,i) in form.labStudentScores" :key="i">
              <input v-model="labStudentScore.studentScores[index]" />
            </td>
            <th>{{quizTotal[index]}}</th>
            <!-- OTHERS -->

            <td v-for="(other,i) in form.others" :key="i+'others'">
              <input v-model="other.studentScores[index]" />
            </td>
            <th>{{othersTotal[index]}}</th>
            <th class="text-center">{{quizTotal[index] + othersTotal[index]}}</th>
            <th class="bg-success text-light">99</th>
          </tr>
          <!-- ./MALE -->
          <tr>
            <th colspan="4" class="text-center bg-primary">Female</th>
            <td v-for="(overAllScore,index) in form.overAllScores" :key="index">
              <input v-model="overAllScore.underScore" class="quiz d-flex" name="over_all_scores" />
            </td>
            <th>{{overAllScores}}</th>
            <td v-for="(overAllScore,index) in form.othersOverAllScores" :key="index + 'others'">
              <input v-model="overAllScore.underScore" class="quiz d-flex" />
            </td>
            <td>{{othersoverAllScores}}</td>
            <td class="text-center">{{othersoverAllScores + overAllScores}}</td>
          </tr>

          <!-- ./ first row  -->

          <tr
            v-for="(classlist,index) in classlists"
            :key="index"
            v-show="classlist.gender ==='female'"
          >
            <td>{{index +1}}</td>
            <td></td>
            <td>{{classlist.name}}</td>
            <td>{{classlist.course}}</td>
            <td v-for="(labStudentScore,i) in form.labStudentScores" :key="i">
              <input v-model="labStudentScore.studentScores[index]" />
            </td>
            <th>{{quizTotal[index]}}</th>

            <!-- OTHERS -->

            <td v-for="(other,i) in form.others" :key="i+'others'">
              <input v-model="other.studentScores[index]" />
            </td>
            <th>{{othersTotal[index]}}</th>
            <th class="text-center">{{quizTotal[index] + othersTotal[index]}}</th>
            <th class="bg-success text-light">99</th>
          </tr>
          <!-- ./FEMALE -->
          <tr>
            <th colspan="4" class="text-center bg-primary">Date</th>
            <th class="relative" v-for="(date,index) in form.dates" :key="index">
              <input type="date" class="InVertAlign" v-model="date.dates" />
            </th>
            <th></th>
            <th class="relative" v-for="(date,index) in form.otherDates" :key="index+ 'otherDates'">
              <input type="date" class="InVertAlign" v-model="date.dates" />
            </th>
          </tr>
          <!-- ./DATE -->
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
import Transmutation from "./Transmutation";
import Accordion from "./Accordion";
export default {
  props: ["classlists", "instructor_id"],
  components: {
    Transmutation,
    Accordion
  },
  data() {
    return {
      form: new Form({
        labStudentScores: [
          { studentScores: [] },
          { studentScores: [] },
          { studentScores: [] },
          { studentScores: [] },
          { studentScores: [] }
        ],
        others: [
          { studentScores: [] },
          { studentScores: [] },
          { studentScores: [] }
        ],
        titles: [
          { titles: [] },
          { titles: [] },
          { titles: [] },
          { titles: [] },
          { titles: [] }
        ],
        othersTitle: [{ titles: [] }, { titles: [] }, { titles: [] }],
        overAllScores: [
          { underScore: [] },
          { underScore: [] },
          { underScore: [] },
          { underScore: [] },
          { underScore: [] }
        ],
        othersOverAllScores: [
          { underScore: [] },
          { underScore: [] },
          { underScore: [] }
        ],
        studentId: [],
        instructorId: this.instructor_id,
        dates: [
          { dates: [] },
          { dates: [] },
          { dates: [] },
          { dates: [] },
          { dates: [] }
        ],
        otherDates: [{ dates: [] }, { dates: [] }, { dates: [] }]
      })
    };
  },
  computed: {
    countQuiz: function() {
      return this.form.labStudentScores.length + 1;
    },
    countOthers: function() {
      return this.form.others.length;
    },
    displayScores() {
      axios
        .get("/api/classlists/" + this.$route.params.placeName)
        .then(({ data }) => (this.classlists = data));
    },
    quizTotal: function() {
      return this.classlists.map((c, index) => {
        return this.form.labStudentScores.reduce((acc, item) => {
          const value = parseInt(item.studentScores[index], 10) || 0;
          return acc + value;
        }, 0);
      });
    },
    othersTotal: function() {
      return this.classlists.map((c, index) => {
        return this.form.others.reduce((acc, item) => {
          const value = parseInt(item.studentScores[index], 10) || 0;
          return acc + value;
        }, 0);
      });
    },
    overAllScores: function() {
      return this.form.overAllScores.reduce((acc, item) => {
        const value = parseInt(item.underScore, 10) || 0;
        return acc + value;
      }, 0);
    },
    othersoverAllScores: function() {
      return this.form.othersOverAllScores.reduce((acc, item) => {
        const value = parseInt(item.underScore, 10) || 0;
        return acc + value;
      }, 0);
    }
  },
  methods: {
    insertScore() {
      this.$Progress.start();
      this.form.post("/api/lec");
      this.$Progress.finish();
    },
    addQuiz: function() {
      this.form.labStudentScores.push({ studentScores: [] });
      this.form.titles.push({ titles: [] });
      this.form.overAllScores.push({ underScore: [] });
      this.form.dates.push({ dates: [] });
    },
    addOthers: function() {
      this.form.others.push({ studentScores: [] });
      this.form.othersTitle.push({ titles: [] });
      this.form.othersOverAllScores.push({ underScore: [] });
      this.form.otherDates.push({ dates: [] });
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
.relative {
  position: relative;
  height: 120px;
  /* border: 3px solid #73ad21; */
}
.InVertAlign {
  transform: rotate(-90deg);
  position: absolute;
  top: 45px;
  left: -45px;
  width: 120px;
  margin-left: 0;
}
.btn-primary {
  width: 50px;
  height: 50px;
  padding: 10px;
}
.quiz-section {
  border-right: 3px blue solid;
  text-align: center;
}
</style>  