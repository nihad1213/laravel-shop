const Ziggy = {"url":"http:\/\/localhost:8080","port":8080,"defaults":{},"routes":{"home":{"uri":"\/","methods":["GET","HEAD"]},"about-us":{"uri":"about-us","methods":["GET","HEAD"]},"contact":{"uri":"contact","methods":["GET","HEAD"]},"storage.local":{"uri":"storage\/{path}","methods":["GET","HEAD"],"wheres":{"path":".*"},"parameters":["path"]},"storage.local.upload":{"uri":"storage\/{path}","methods":["PUT"],"wheres":{"path":".*"},"parameters":["path"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
