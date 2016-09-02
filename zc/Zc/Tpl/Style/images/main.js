/**
 * Created by wangyi9 on 2015/4/26.
 */
/* @update: 2015-4-15 22:45:45 */
seajs.config({
    comboExcludes: /.*/,
    paths: {project: "http://z.jd.com/big/js/"}
}), seajs.use([ "project/JhobSlidelist", "project/select", "project/hotnotice"], function ( o, c, s) {
     o(), c(), s()
});
