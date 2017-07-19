using UnityEngine;
using System.Collections;

public class CharacterHitCalculator : MonoBehaviour 
{
	public HighScoreUploader HighScore = new HighScoreUploader();
	public HUDBuilder HUD;
	public BackgroundRoller Roller;
	public bool power;
	public GameObject RefYellow;
	public GameObject BreakableEnemy;
	public GameObject GameOverMenu;
	public GameObject ObjectManager;
	public float XPLayScreenWidth = 7.5f;
	public float TimerGameOverMoment = 0;
	public float WaitTime = 0.5f;
	public int PlayerLives = 1;

	// Use this for initialization
	void Start () 
	{
		HUD = GameObject.Find ("Main Camera").GetComponent<HUDBuilder> ();
		Roller = GameObject.Find ("Background").GetComponent<BackgroundRoller> ();
		BreakableEnemy = GameObject.FindGameObjectWithTag ("BreakableEnemy");
	}
	
	// Update is called once per frame
	void Update () 
	{
		if ( HUD.Timer <= TimerGameOverMoment)
		{
			StartCoroutine ("mLose");
		}

		if (this.gameObject.transform.position.x > XPLayScreenWidth || 
			this.gameObject.transform.position.x < -XPLayScreenWidth ) 
		{
			Destroy (this.gameObject);
			StartCoroutine ("mLose");
		}
	}

	void OnTriggerEnter2D(Collider2D coll) 
	{
		if (coll.gameObject.tag == "Enemy") 
		{
			StartCoroutine ("mLose");
		}

//		if (coll.gameObject.tag == "BreakableEnemy") 
//		{
//			if (BreakableEnemy.GetComponent<CharacterMovement> ().power == false) 
//			{
//				StartCoroutine ("mLose");
//			}
//		Destroy (BreakableEnemy);
//		}
	}
	
	IEnumerator mLose()
	{
		yield return new WaitForSeconds (WaitTime);
		if (PlayerLives == 1) 
		{
			PlayerLives -= 1;
			RefYellow.SetActive(true);
		} else {
			HighScore.PostScores("AAA", (int)HUD.playerScore);
			RefYellow.SetActive(false);
			Destroy (this.gameObject);
			GameOverMenu.SetActive(true);
			ObjectManager.SetActive(false);
			Roller.scrollSpeed = 0f;
			Roller.speedUpAmount = 0f;
		}

	}
	
}
