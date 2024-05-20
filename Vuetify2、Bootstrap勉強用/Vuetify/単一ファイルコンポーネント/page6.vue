<template>
  <v-app>
    <h1>テストカード</h1>
    <v-card @click.stop="dialog = true" href="#" max-width="250" prepend-icon="mdi-github" rel="noopener" subtitle="Check out the official repository" title="Vuetify on GitHub">
      <v-card-title>
        Card title
      </v-card-title>
      <v-progress-circular v-show="isLoading" :indeterminate="!isLoading" :size="100" color="primary" class="my-2"></v-progress-circular>
      <v-card-subtitle>
        Card subtitle secondary text
      </v-card-subtitle>
        
      

      <v-card-text>
        <p v-for="(item,index) in items" :key="index">{{item.id}}：{{item.name}}</p>
      </v-card-text>
    </v-card>
    <v-dialog v-model="dialog" max-width="290" persistent>
        <v-card>
          <v-card-title>タイトル</v-card-title>
          <v-card-text>
            <v-text-field label="Label"></v-text-field>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn @click="dialog = false">閉じる</v-btn>
            <v-spacer></v-spacer>
          </v-card-actions>
        </v-card>
      </v-dialog>
  </v-app>
</template>

<script>
module.exports = {
  data() {
    return {
      items: [],
      isLoading: true,
      dialog: false,
    }
  },
  methods: {
    fetchItem () {
      const self = this
      axios.get("./単一ファイルコンポーネント/PHP_DB/fetch_db.php").then(function (response) {
        self.items = response.data
        self.isLoading = false;
      }).catch(function(error){
        self.errorFlag = true;
        alert(error)
      });
    }
  },
  mounted () {
    // アプリケーションが立ち上がったら商品一覧を取得する
    // インスタンス初期化時、DOMが生成された後に実行される
    this.fetchItem()
  }
}
</script>

<style scoped>

</style>