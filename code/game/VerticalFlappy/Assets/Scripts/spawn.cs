using UnityEngine;
using System.Collections;

public class spawn : MonoBehaviour {
	
	public Transform coin;
	public Transform Upgrade;
	public Transform Enemy;
	public Transform Goal;
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
		yield return new WaitForSeconds(5f);
		//SpawnableC = true;;
		//GameObject enemy = GameObject.FindGameObjectWithTag("Enemy");
		//Destroy(enemy);
	}

	IEnumerator mSpawnGoal()
	{			
		Instantiate (Goal);
		yield return new WaitForSeconds(30f);
		SpawnableD = true;
	}


}
