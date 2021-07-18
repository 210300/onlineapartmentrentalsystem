import java.util.Scanner;

public class Sample{
	public static void main(String[] args) {
		Scanner obj = new Scanner(System.in);
		HashMap<String, String> map = new HashMap<>();
		Stirng str  = obj.nextLine();
		map.put("dog","ogday");
		map.put("cat","atcay");
		map.put("pig","igpay");
		map.put("froot","ootfray");
		map.put("loops","oopslay");

		while(map.hasNext()){
			if(str.equals(map.getKey())){
				System.out.println(getKey());
			}
		}
	}
}