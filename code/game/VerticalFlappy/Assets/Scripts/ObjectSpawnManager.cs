using UnityEngine;
using System.Collections;

public class ObjectSpawnManager : MonoBehaviour {
	
	public Transform coin;
	public Transform Upgrade;
	public Transform Enemy;
	public Transform Goal;
	private Animator MaleBlock;
	private bool Spawnable = true;
	private bool SpawnableB = true;
	private bool SpawnableC = true;
	private bool SpawnableD = true;

	// Use this for initialization
	void Start () {
	}
	
	// Update is called once per frame
	void Update () {
		if (Spawnable) {
			Spawnable = false;
			StartCoroutine("mSpawnCoin");
		}
		if (SpawnableB) {
			SpawnableB = false;
			StartCoroutine("mSpawnUpgrade");
		}
		if (SpawnableC) {
			SpawnableC = false;
			StartCoroutine("mSpawnEnemy");
		}
		if (SpawnableD) {
			SpawnableD = false;
			StartCoroutine("mSpawnGoal");
		}
	}

	IEnumerator mChooseBlockAnim()
	{			
		MaleBlock = GameObject.Find("Block").GetComponent<Animator> ();
		MaleBlock.SetInteger ("Random", UnityEngine.Random.Range(1,9));
		yield return new WaitForSeconds(2f);
	}

	IEnumerator mSpawnCoin()
	{			
		Instantiate (coin);
		yield return new WaitForSeconds(10f);
		Spawnable = true;
	}

	IEnumerator mSpawnUpgrade()
	{			
		Instantiate (Upgrade);
		yield return new WaitForSeconds(20f);
		SpawnableB = true;
	}

	IEnumerator mSpawnEnemy()
	{			
		Instantiate (Enemy);
		mChooseBlockAnim();
		yield return new WaitForSeconds(20f);
		Destroy (GameObject.FindGameObjectWithTag ("Enemy"));
		SpawnableC = true;
		
	}

	IEnumerator mSpawnGoal()
	{			
		Instantiate (Goal);
		yield return new WaitForSeconds(30f);
		SpawnableD = true;
	}


}
