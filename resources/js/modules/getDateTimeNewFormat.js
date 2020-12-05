export function getDateTimeNewFormat(date) {
   const y = date.getFullYear();
   const m = ('0' + (date.getMonth() + 1)).slice(-2); // 0から取得するので+1
   const d = ('0' + date.getDate()).slice(-2);
   const h = ('0' + date.getHours()).slice(-2);
   const i = ('0' + date.getMinutes()).slice(-2);
   const newFormat = y + '/' + m + '/' + d + ' ' + h + ':' + i;

   return newFormat;
}
