<template>
  <v-app>
    <div class="text-center pa-4">
      <v-btn @click.stop="dialog = true">ダイアログを開く</v-btn>
            <!--モーダルダイアログを定義します。
              persistentを指定するとモーダルになります。-->
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
    </div>
  </v-app>
</template>

<script>
module.exports = {
  data() {
    return {
      dialog: false,
    }
  }
}
</script>

<style scoped>
h1 {
    color: red;
}
</style>