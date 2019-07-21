package sample;

import org.apache.logging.log4j.LogManager;
import org.apache.logging.log4j.Logger;

/**
* [HelloWorldのアクションクラス]<br>
*<br>
* @author fumi
*/
public class HelloWorldAction {
    /** ロガー */
    private Logger logger = LogManager.getLogger(HelloWorldAction.class);
    /** 名前 */
    private String name;
    /**
     * [アクション実行処理]<br>
     * HelloWorldを出力する処理を実行する。<br>
     * 実行するメソッドは、struts.xmlで指定したメソッド名を使用して実装する。<br>
     * Struts2ではアクションの処理結果でページの遷移先を決定するが、
     * 今回は"success"の固定文字列を返却する。<br>
     * <br>
     * @return
     */
    public String execute() {
        logger.info("入力されたパラメータは「{}」です。", name);
        return "success";
    }
    /**
     * [名前取得処理]<br>
     * 名前を取得します。<br>
     * Struts2がフォームに入力された値をパラメータとしてする際、
     * getterを使用するため、パラメータとして使用したい情報は、
     * Actionクラスのプロパティとして宣言しておき、getterを用意する。
     *<br>
     * @return 名前
     */
    public String getName() {
        return name;
    }
    /**
     * [名前設定処理]<br>
     * 名前を設定します。<br>
     * getter同様、ページ間で受け渡したい値はsetterを用意しておく。<br>
     *<br>
     * @param name 名前
     */
    public void setName(String name) {
        this.name = name;
    }
}
